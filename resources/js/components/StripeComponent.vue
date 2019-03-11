<template>
    <form ref="form" @submit.prevent="donate()" class="w-full md:w-1/2 my-6">
        <label>
            <span>Name</span>
            <input v-model="extraDetails.name" name="name" class="field" placeholder="Jane Doe" required/>
        </label>
        <label>
            <span>Phone</span>
            <input v-model="phone" class="field" placeholder="(123) 456-7890" type="tel" required/>
        </label>
        <label>
            <span>Amount</span>
            <money v-model="amount" v-bind="money" class="field"></money>
            <!-- <input v-model="amount" name="amount" class="field" placeholder="eg. $25.00" /> -->
        </label>
        <label>
            <span class="hidden md:inline">Card</span>
            <div ref="card" id="card-element" class="field"></div>
        </label>
        <button type="submit">Donate</button>
        <div class="outcome">
            <div v-if="error" class="error">{{ errorMessage }}</div>
            <div v-if="success" class="success">
                Success! Your Stripe token is <span class="token">{{ token }}</span>
            </div>
        </div>
    </form>
</template>

<script>
    import { config } from 'Config';
    import { Money } from 'v-money';
    import Donation from 'Models/Donation';

    export default {
        components: { Money },
        data () {
            return {
                stripe: undefined,
                elements: undefined,
                card: undefined,
                style: {
                    base: {
                        color: "#000",
                    },
                    invalid: {
                        color: "#fb040f"
                    },
                },
                fonts: [
                    {
                    family: 'Open Sans',
                    weight: 400,
                    src: 'local("Open Sans"), local("OpenSans"), url(https://fonts.gstatic.com/s/opensans/v13/cJZKeOuBrn4kERxqtaUH3ZBw1xU1rKptJj_0jans920.woff2) format("woff2")',
                    unicodeRange: 'U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215',
                    },
                ],
                extraDetails: {
                    name: null,
                },
                phone: null,
                amount: 0,
                success: false,
                error: false,
                token: null,
                errorMessage: null,
                money: {
                    decimal: '.',
                    thousands: ',',
                    prefix: '$ ',
                    suffix: '',
                    precision: 2,
                    masked: false
                },
            }
        },
        created () {
            /* global Stripe */
            this.stripe = Stripe (`${config.stripe}`);
            this.elements = this.stripe.elements({
                fonts: this.fonts
            });
            this.card = this.elements.create('card', {style: this.style});

            this.card.on('change', event => {
                this.processOutcome(event);
            });
        },
        mounted () {
            this.card.mount(this.$refs.card);
        },
        methods: {
            donate () {
                this.error = false;
                this.success = false;
                this.errorMessage = '';
                if (this.amount < 5) {
                    this.error = true;
                    this.errorMessage = 'Amount must be at least $5.00';

                    return;
                }
                if (this.phone === null) {
                    this.error = true;
                    this.errorMessage = 'Please provide a phone number.';

                    return;
                }
                let extraDetails = {
                    name: this.extraDetails.name,
                };
                this.stripe.createToken(this.card, extraDetails).then(this.processOutcome);
            },
            processOutcome (result) {
                if (result.token) {
                    this.token = result.token.id;
                    Donation.store({ name: this.extraDetails.name, phone: this.phone, amount: this.amount, token: result.token['id'] }).then( response => {
                        this.resetForm();
                        this.$dispatch('notification', response.success);
                    }).catch( error => {
                        this.resetForm();
                        this.$dispatch('error', error.data.error);
                    });
                } else if (result.error) {
                    this.error = true;
                    this.errorMessage = result.error.message;
                }
            },
            resetForm () {
                this.card.clear();
                this.error = false;
                this.success = false;
                this.extraDetails.name = null;
                this.phone = null;
                this.amount = 0;
                this.token = null;
                this.errorMessage = null;
            }
        },
    }
</script>

<style scoped lang="scss">
    @font-face {
        font-family: 'Open Sans';
        font-weight: 400;
        src: local("Open Sans"), local("OpenSans"), url(https://fonts.gstatic.com/s/opensans/v13/cJZKeOuBrn4kERxqtaUH3ZBw1xU1rKptJj_0jans920.woff2) format("woff2");
        unicodeRange: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
    }

    label {
        position: relative;
        color: #6A7C94;
        font-weight: 400;
        height: 48px;
        line-height: 48px;
        margin-bottom: 10px;
        display: flex;
        flex-direction: row;
    }

    label > span {
        width: 115px;
    }

    .field {
        background: white;
        box-sizing: border-box;
        font-weight: 400;
        border: 1px solid #CFD7DF;
        border-radius: 24px;
        color: #32315E;
        outline: none;
        flex: 1;
        height: 48px;
        line-height: 48px;
        padding: 16px 20px;
        cursor: text;
    }

    .field::-webkit-input-placeholder { color: rgb(145, 149, 153); }
    .field::-moz-placeholder { color: rgb(145, 149, 153); }

    .field:focus,
    .field.StripeElement--focus {
        border-color: #F99A52;
    }

    button {
        float: left;
        display: block;
        background-image: linear-gradient(-180deg, #F8B563 0%, #F99A52 100%);
        box-shadow: 0 1px 2px 0 rgba(0,0,0,0.10), inset 0 -1px 0 0 #E57C45;
        color: white;
        border-radius: 24px;
        border: 0;
        margin-top: 20px;
        font-size: 17px;
        font-weight: 500;
        width: 160px;
        height: 48px;
        line-height: 48px;
        outline: none;
    }

    button:focus {
        background: #EF8C41;
    }

    button:active {
        background: #E17422;
    }

    .outcome {
        float: left;
        width: 100%;
        padding-top: 8px;
        min-height: 20px;
        text-align: center;
    }

    .success, .error {
        font-size: 13px;
    }

    .error {
        color: #E4584C;
    }

    .success {
        color: #38C172;
    }

    .success .token {
        font-weight: 500;
        font-size: 13px;
    }
</style>