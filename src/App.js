import { BrowserRouter, Route, Routes } from 'react-router-dom';
import './App.css';
import Home from './paginas/home/home'
import Login from './paginas/login/login'
import RotasProtegidas from './RotasProtegidas';

function App() {
  return (
    <div className="App">
        <Routes>
          <Route path="/entrar" element={ <Login/> } />
          <Route element={ <RotasProtegidas/> }>
            <Route path="/" element={ <Home/> } />
          </Route>
          <Route path="*" element={ <div>404 - Página não encontrada!</div> } />
        </Routes>
    
    </div>
  );
}

export default App;
