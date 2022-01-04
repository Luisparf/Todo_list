import React, { useState, useEffect } from 'react';
import { TextField, FormControl, InputLabel, Select, MenuItem } from '@material-ui/core';

export default function InsertTask({ onInsertTask, taskList }) {
  const [lists, setLists] = useState([]);
  const [selectList, setSelectList] = useState("");
  const [taskName, setTaskName] = useState("");
  
  useEffect(() => {
    if(taskList.length > 0){
      setLists(taskList);
    }
  }, [taskList]);

  const handleChangeSelect = (event) => {
    setSelectList(event?.target.value);
  };

  const handleSubmit = async (event) => {
    event.preventDefault();

    await onInsertTask({
      "list_id": selectList,
      "title": taskName,
      "status": 0
    });

    setSelectList("");
    setTaskName("");
  };

  return (
    <div className="form">
      <strong>Register task</strong>
      <form noValidate autoComplete="off" onSubmit={handleSubmit}>
        
        <div>
          <TextField 
            name="taskName" 
            id="taskName" 
            label="Task tittle"
            className="TextFieldBlock" 
            value={taskName}
            onChange={e => setTaskName(e.target.value)}
            required
          />
        </div>
        <div className="selectBox">
          <FormControl className="fullWidth">
            <InputLabel id="select-list-label">Select list</InputLabel>
            <Select
              labelId="select-list-label"
              id="select-list"
              name="taskList" 
              value={selectList}
              onChange={handleChangeSelect}
            >
              {lists.length > 0 ? lists.map((list) => 
                (
                  <MenuItem key={list.id} value={list.id}>{list.title}</MenuItem>
                )
              ): null }
            </Select>
          </FormControl>
        </div>

        <button type="submit">Save</button>
      </form>
    </div>
  );
}