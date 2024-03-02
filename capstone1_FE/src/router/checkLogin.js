import axios from "axios";
import { createToaster } from "@meforma/vue-toaster";

const toastr = createToaster({
    position: "top-right",
  });
export default function(to, from, next) {
    axios.post('http://127.0.0.1:8000/api/check-login',{}, {
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token-admin')
        }
    }).then((res) => {
        if(res.status === 200) {
            next();
        } else {
            toastr.warning("Thông báo<br> Bạn chưa đăng nhập!")
            next("/admin/login");
        }
    }).catch((res) =>  {
        toastr.warning("Thông báo<br> Bạn chưa đăng nhập!")
        next("/admin/login");
    });
}