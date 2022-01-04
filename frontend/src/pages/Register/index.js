import React, { useState } from 'react';
import { Link, useHistory } from 'react-router-dom';
import { FiArrowLeft } from 'react-icons/fi';
import api from '../../services/api';
import './styles.css';

export default function Register() {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [confirmPassword, setConfirmPassword] = useState('');

  const history = useHistory();

  async function handleRegister(e) {
    e.preventDefault();

    const data = {
      "name":name,
      "email":email,
      "password":password,
      "password_confirmation":confirmPassword,
    };
    
    try {
      api.post('api/register', data)
      .then(async (res) =>{
        if(res.data.status){
         const responseLogin = await api.post('api/login', { email, password });
         localStorage.setItem('token', responseLogin.data.token);
          history.push('/lists');
        }
      });
    } catch (err) {
      alert('Register error, try again.');
    }
  }

  return (
    <div className="register-container">
      <div className="content">
        <section>
          <h1>Register</h1>
          <p>Register yourself, sign in and organize your tasks.</p>

          <Link className="back-link" to="/">
            <FiArrowLeft size={16} color="#ca83d3"/>
            I'm registered already
          </Link>
        </section>

        <form onSubmit={handleRegister}>
          <input 
            placeholder="Your name"
            value={name}
            onChange={e => setName(e.target.value)}
          />

          <input 
            type="email" 
            placeholder="Your E-mail"
            value={email}
            onChange={e => setEmail(e.target.value)}
          />

          <input 
            placeholder="Type your password"
            value={password}
            type="password"
            onChange={e => setPassword(e.target.value)}
          />

          <input 
            placeholder="Confirm your password"
            value={confirmPassword}
            type="password"
            onChange={e => setConfirmPassword(e.target.value)}
          />

          <button className="button" type="submit">Sign in</button>
        </form>
      </div>
    </div>
  );
}