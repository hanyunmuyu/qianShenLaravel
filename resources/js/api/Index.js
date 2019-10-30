import axios from 'axios'

axios.defaults.baseURL = process.env.MIX_SENTRY_DSN_PUBLIC + 'api/v1';

function get(url, params) {
    if (params === undefined) {
        params = {}
    }
    return axios.get(url, params).then((res) => {
        return res.data;
    });
}

function post(url, params) {
    if (params === undefined) {
        params = {}
    }
    return axios.post(url, params).then((res) => {
        return res.data;
    });
}

const Api = {
    login: function () {
        return post('/login', {'userName': 'hanyun', 'password': '123456'})
    }
};
export default Api;
