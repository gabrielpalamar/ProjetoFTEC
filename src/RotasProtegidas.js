import { Navigate, Outlet } from "react-router-dom";

const useAuth = () => {
    const usuario = JSON.parse(localStorage.getItem('usuario'))
    return usuario && usuario.logado;
}

const RotasProtegidas = () => {
    const estaLogado = useAuth();
    console.log(estaLogado);
    return estaLogado? <Outlet/> : <Navigate to="/entrar"/>
};

export default RotasProtegidas;