import axios from "axios";

const baseDomain = "";
const baseUrl = `${baseDomain}/api`;

export default axios.create({
    baseURL
});
