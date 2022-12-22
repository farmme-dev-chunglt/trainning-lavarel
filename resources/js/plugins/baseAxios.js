import axios from 'axios'
export const http = axios.create({
  baseURL: `http://127.0.0.1:8000/api/v1/`,
  headers: {
    // Authorization: 'Bearer {token}'
  }
})
http.interceptors.response.use(
  (response) => response,
  (error) => {
    if (error.response.status === 400) {
      alert('err')
    }
  }
)
export default http
