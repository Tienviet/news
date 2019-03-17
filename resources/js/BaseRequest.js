import axios from 'axios';
export const HTTP = axios.create({
    baseURL: `http://127.0.0.1:8000`,
    headers: {
        Authorization: 'Bearer {token}'
    }
})
