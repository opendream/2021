// Time to create this web around 1 day

import React, { useState, useEffect, forwardRef } from "react";
import './App.css';
import axios from "axios";
import { makeStyles } from '@material-ui/core/styles';
import Avatar from '@material-ui/core/Avatar';
import MaterialTable, { MTableToolbar } from 'material-table';
import {FirstPage, LastPage, ChevronRight, ChevronLeft, ArrowDownward} from '@material-ui/icons';
import CardContent from '@material-ui/core/CardContent';

// Styles for Avatar
const useStyles = makeStyles((theme) => ({
  root: {
    display: 'flex',
    '& > *': {
      margin: theme.spacing(1),
    },
  },
  large: {
    width: theme.spacing(7),
    height: theme.spacing(7),
  },
}));

// Styles for Card
const useStyles2 = makeStyles({
  root: {
    minWidth: 275,
  },
  bullet: {
    display: 'inline-block',
    margin: '0 5px',
    transform: 'scale(0.9)',
  },
  title: {
    fontSize: 14,
  },
  pos: {
    marginBottom: 50,
  },
});


// Get data from .Json
const App = () => {
  const [posts, setPosts] = useState([]);

  useEffect(()=> {
    const fatchPoste = async () => {
      const res = await axios.get('https://raw.githubusercontent.com/opendream/openteam/main/posts.json');
      setPosts(res.data)
    }
    fatchPoste();
  }, []);

// get tableIcons to use in the MaterialTable
  const tableIcons = {
    FirstPage: forwardRef((props, ref) => <FirstPage {...props} ref={ref} />),
    LastPage: forwardRef((props, ref) => <LastPage {...props} ref={ref} />),
    NextPage: forwardRef((props, ref) => <ChevronRight {...props} ref={ref} />),
    PreviousPage: forwardRef((props, ref) => <ChevronLeft {...props} ref={ref} />),
    SortArrow: forwardRef((props, ref) => <ArrowDownward {...props} ref={ref} />),
  };

// Cell useStyles
const classes = useStyles();
const classes2 = useStyles2();

// Indentify columns 
const columns = [
  { title: 'Avatar', field: 'userAvatar', render: rowData =>  <Avatar className={classes.large} alt="Remy Sharp" src={rowData.userAvatar} />},
  { title: 'Id', field: 'id'},
  { title: 'User Id', field: 'userId' },
  { title: 'Title', field: 'title'},
  { title: 'Body',field: 'body'},
]

return (
  <center>
    <div style={{width: '80%', height: '100%'}}>
      <h1>OpenDream</h1>
        <CardContent className={classes2.root}>
          <MaterialTable 
            icons={tableIcons}
            title="My Blog"
            options={{
              pageSize: 20,
              search: false
            }}
            columns={columns}
            data={posts}        
            />
        </CardContent>

    </div> 
  </center>
 
  )
}
export default App;
