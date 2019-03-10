import Model from 'Models/Model';
import axios from 'axios';

class Donation extends Model {
    constructor () {
        if (! Donation.instance) {
            super();
            Donation.instance = this;
        }

        return Donation.instance;
    }

    store ({ name, phone, amount, token }) {
        const formData = this.buildFormData(name, phone, amount, token);

        return new Promise( (resolve, reject) => {
            const requestOptions = {
                method: 'POST',
                url: '/donate',
                data: formData,
            };

            axios(requestOptions).then( response => {

                return resolve(response.data);
            }).catch( error => {

                return reject(error.response);
            });
        });
    }

    buildFormData (name, phone, amount, token) {
        let formData = new FormData();
        formData.append('name', name);
        formData.append('phone', phone);
        formData.append('amount', amount);
        formData.append('token', token);

        return formData;
    }
}

const instance = new Donation();

export default instance;