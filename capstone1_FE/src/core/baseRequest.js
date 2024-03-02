import axios from 'axios';

// const apiUrl = 'https://dzfullstack.com/api/'; 
const apiUrl = 'http://127.0.0.1:8000/api/'; 

export default {
    getHeader() {
        if (window.localStorage.getItem('token-sinh-vien') != null) {
            if(window.localStorage.getItem('token-sinh-vien') == null) {
                return {}
            }
            return { Authorization : 'Bearer ' + window.localStorage.getItem('token-sinh-vien') }
        } else if(window.localStorage.getItem('token-admin') != null){
            if(window.localStorage.getItem('token-admin') == null) {
                return {}
            }
            return { Authorization : 'Bearer ' + window.localStorage.getItem('token-admin') }
        } else if(window.localStorage.getItem('token-giang-vien') != null) {
            if(window.localStorage.getItem('token-giang-vien') == null) {
                return {}
            }
            return { Authorization : 'Bearer ' + window.localStorage.getItem('token-giang-vien') }
        }
        
    },
    get(url) {
        return axios.get(apiUrl + url, { headers : this.getHeader() });
    },
    post(url, data) {
        return axios.post(apiUrl + url, data, { headers : this.getHeader() });
    },
}