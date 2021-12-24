import React, { useState } from 'react';
import { TextField  } from '@material-ui/core';

export default function InsertList({ onInsertList }) {
  const [listName, setListName] = useState("");

  const handleSubmit = async (event) => {
    event.preventDefault();

    await onInsertList({
      "title": listName,
	    "status": 0
    });

    setListName("");
  };

  return (
    <div className="form">
      <strong>Register list</strong>
      <form noValidate autoComplete="off" onSubmit={handleSubmit}>
        <TextField 
          name="listName" 
          id="listName" 
          label="Tasklist tittle"
          className="TextFieldBlock" 
          value={listName}
          onChange={e => setListName(e.target.value)}
          required
        />
        <button type="submit">Save</button>
      </form>
    </div>
  );
}