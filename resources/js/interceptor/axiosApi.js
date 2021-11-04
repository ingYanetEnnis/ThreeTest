import axios from "axios";
var url = process.env.MIX_API_URL;
//baseURL: (process.env.VUE_APP_BASE_URL !== undefined) ? process.env.VUE_APP_BASE_URL : '//127.0.0.1/'

const axiosApi = axios.create();
axiosApi.interceptors.request.use(
    (config) => {
        let token = localStorage.getItem('token')
        if (token) {
            config.headers['Authorization'] = `Bearer ${ token }`
        }
      //  config.baseURL = url;

        return config
    },
    (error) => {
        return Promise.reject(error)
    }
);
export default axiosApi;
