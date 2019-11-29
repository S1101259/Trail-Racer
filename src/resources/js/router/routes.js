import Home from "../views/home/Home";
import LoginPage from "../views/auth/LoginPage";
import RegisterPage from "../views/auth/RegisterPage";
import Leaderboard from "../views/leaderboard/Leaderboard";

export const routes = [
    {path: '/', name: 'home', component: Home},
    {path: '/login', name: 'login', component: LoginPage},
    {path: '/register', name: 'register', component: RegisterPage},
    {path: '/leaderboard', name: 'leaderboard', component: Leaderboard},
];
