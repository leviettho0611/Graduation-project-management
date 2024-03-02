import { createRouter, createWebHistory } from "vue-router"; // cài vue-router: npm install vue-router@next --save
import { createToaster } from "@meforma/vue-toaster";
import checkLogin from "./checkLogin";
const toastr = createToaster({
  position: "top-right",
});
const routes = [
  //admin
  {
    path: "/admin",
    component: () => import("../components/TrangChu/index.vue"),
    beforeEnter:checkLogin
  },
  {
    path: "/admin/quan-li-nk",
    component: () => import("../components/QuanLiNienKhoa/index.vue"),
    beforeEnter:checkLogin
  },
  {
    path: "/admin/quan-li-gv",
    component: () => import("../components/GiangVien/index.vue"),
    beforeEnter:checkLogin
  },

  {
    path: "/admin/ngan-hang-de-tai-admin",
    component: () => import("../components/NganHangDeTai/index.vue"),
    beforeEnter:checkLogin
  },
  {
    path: "/admin/ke-hoach-tot-nghiep",
    component: () => import("../components/KeHoachTotNghiep/index.vue"),
    beforeEnter:checkLogin
  },
  {
    path: "/admin/quan-li-hoi-dong",
    component: () => import("../components/QuanLiHoiDong/index.vue"),
    beforeEnter:checkLogin
  },
  {
    path: "/admin/nhom-do-an",
    component: () => import("../components/NhomDoAn/index.vue"),
    beforeEnter:checkLogin
  },
  {
    path: "/admin/quan-li-sv",
    component: () => import("../components/QuanLiSinhVien/index.vue"),
    beforeEnter:checkLogin
  },
  {
    path: "/admin/tien-do",
    component: () => import("../components/TienDo/index.vue"),
    beforeEnter:checkLogin
  },
  {
    path: "/admin/phan-quyen",
    component: () => import("../components/PhanQuyen/index.vue"),
    beforeEnter:checkLogin
  },
  {
    path: "/admin/tai-khoan",
    component: () => import("../components/TaiKhoan/index.vue"),
    beforeEnter:checkLogin
  },
  {
    path: "/admin/duyet-nhom",
    component: () => import("../components/DuyetNhom/index.vue"),
    beforeEnter:checkLogin
  },
  {
    path: "/admin/login",
    meta: { layout: "login-admin" },
    component: () => import("../components/Login/index.vue"),
  },
  // Sinh Viên
  {
    path: "/",
    meta: { layout: "sinhvien",},
    component: () => import("../components_user/TrangChuUser/index.vue"),
  },
  {
    path: "/sinh-vien-nhom-do-an",
    meta: { layout: "sinhvien"},
    component: () => import("../components_user/SinhVien/index.vue"),
  },
  {
    path: "/ngan-hang-de-tai",
    meta: { layout: "sinhvien"},
    component: () => import("../components_user/NganHangDeTai/index.vue"),
  },
  {
    path: "/sinh-vien/login",
    meta: { layout: "login-sinhvien" },
    component: () => import("../components/Login/sinh_vien.vue"),
  },

  //giảng viên

  {
    path: "/trang-chu-gv",
    meta: { layout: "giangvien",},
    component: () => import("../components_user/TrangChuUser/index.vue"),
  },
  {
    path: "/hoi-dong-danh-gia",
    meta: { layout: "giangvien" },
    component: () => import("../components_user/HoiDongDanhGia/index.vue"),
  },
  {
    path: "/dang-nhap",
    meta: { layout: "login-giangvien" },
    component: () => import("../components_user/DangNhapUser/index.vue"),
  },
  {
    path: "/giang-vien-nhom-do-an",
    meta: { layout: "giangvien" },
    component: () => import("../components_user/GiangVien/index.vue"),
  },
  // {
  //   path: "/chi-tiet-sinh-vien",
  //   meta: { layout: "giangvien" },
  //   component: () => import("../components_user/ChiTietSinhVien/index.vue"),
  // },
  // {
  //   path: "/chia-nhom",
  //   meta: { layout: "giangvien" },
  //   component: () => import("../components_user/ChiaNhom/index.vue"),
  // },
];

const router = createRouter({
  history: createWebHistory(),
  routes: routes,
});

export default router;
