import axios from "axios";
var url = ' http://127.0.0.1:8001/api/';
//baseURL: (process.env.VUE_APP_BASE_URL !== undefined) ? process.env.VUE_APP_BASE_URL : '//127.0.0.1/'

const axiosApi = axios.create();

/*
 * The interceptor here ensures that we check for the token in local storage every time an ajax request is made
 */
axiosApi.interceptors.request.use(
    (config) => {
        let token = localStorage.getItem('token')
        if (token) {
            config.headers['Authorization'] = `Bearer ${ token }`
        }
        config.baseURL = url;

        return config
    },
    (error) => {
        return Promise.reject(error)
    }
);
export default axiosApi;
