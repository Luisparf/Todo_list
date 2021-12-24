import React, { useState } from 'react';
import { Link, useHistory} from 'react-router-dom';
import { FiLogIn } from 'react-icons/fi';
import api from '../../services/api';
import './styles.css';

export default function Logon() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const history = useHistory();

  async function handleLogin(e) {
    e.preventDefault();

    try {
      const response = await api.post('api/login', { email, password });
      localStorage.setItem('token', response.data.token);

      history.push('/lists');
    } catch (err) {
      alert('Login failed, try again..');
    }
  }

  return (
    <div className="logon-container">
      <section className="form">

        <form onSubmit={handleLogin}>
          <input 

            placeholder="Your e-mail"
            value={email}
            onChange={e => setEmail(e.target.value)}
          />
          <input 
            placeholder="Your password"
            type="password"
            value={password}
            onChange={e => setPassword(e.target.value)}
          />

          <button className="button" type="submit">Login</button>

          <Link className="back-link" to="/register">
            <FiLogIn size={16} color="#3498db" />
            I'm not registered
          </Link>
        </form>
      </section>
    </div>
  );
}