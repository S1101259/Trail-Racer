import Home from "../views/home/Home";
import LoginPage from "../views/auth/LoginPage";
import RegisterPage from "../views/auth/RegisterPage";
import Leaderboard from "../views/leaderboard/Leaderboard";
import CompetitionOverview from "../views/competitions/CompetitionOverview";
import AddCompetitionPage from "../views/competitions/AddCompetitionPage";
import ShowCompetition from "../views/competitions/ShowCompetition";
import AddTime from "../views/competitions/AddTime";

export const routes = [
    {path: '/', name: 'home', component: Home},
    {path: '/login', name: 'login', component: LoginPage},
    {path: '/register', name: 'register', component: RegisterPage},
    {path: '/leaderboard', name: 'leaderboard', component: Leaderboard},
    {path: '/competitions', name: 'competitions', component: CompetitionOverview},
    {path: '/competition', name: 'competitions', component: CompetitionOverview},
    {path: '/competition/create', name: 'createCompetition', component: AddCompetitionPage},
    {path: '/competition/:competition', name: 'showCompetition', component: ShowCompetition},
    {path: '/competition/:competition/addTime', name: 'addTime', component: AddTime},
];
