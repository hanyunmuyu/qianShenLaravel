import axios from 'axios'

axios.defaults.baseURL = process.env.MIX_SENTRY_DSN_PUBLIC + '/api/v1';

function get(url, params, headers) {
    if (params === undefined) {
        params = {}
    }
    if (headers !== undefined) {
        axios.headers = headers;
    }
    return axios.get(url, params).then((res) => {
        return res.data;
    });
}

function post(url, params, headers) {
    if (params === undefined) {
        params = {}
    }
    if (headers !== undefined) {
        axios.headers = headers;
    }
    return axios.post(url, params).then((res) => {
        return res.data;
    });
}

const Api = {
    login: function (user) {
        return post('/login', user);
    },
    upload: function (data, headers) {
        return post('/upload', data, headers);
    }
};
export default Api;
