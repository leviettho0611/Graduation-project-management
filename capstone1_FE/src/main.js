import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import SinhVien from './Layout/Wrapper/SinhVien/index.vue'
import GiangVien from './Layout/Wrapper/GiangVien/index.vue'
import Default from './Layout/Wrapper/Admin/index.vue'
import LoginSinhVien from './components/Login/sinh_vien.vue'
import LoginGiangVien from './components_user/DangNhapUser/index.vue'
import LoginAdmin from './components/Login/index.vue'
import axios from 'axios';
import Toaster from "@meforma/vue-toaster";

axios.defaults.baseURL = 'http://127.0.0.1:8000/api/'; 
const app = createApp(App)

app.use(router)
app.use(Toaster, {
    position : "top-right"
})
app.component("giangvien-layout", GiangVien);
app.component("sinhvien-layout", SinhVien);
app.component("default-layout", Default);
app.component("login-sinhvien-layout", LoginSinhVien);
app.component("login-giangvien-layout", LoginGiangVien);
app.component("login-admin-layout", LoginAdmin);
app.mount("#app")