import React from 'react';
// import Pagination from "react-js-pagination";
import Pagination from "react-bootstrap-4-pagination";
import './App.css';



class App extends React.Component{
  constructor() {
      super();
      this.state = {
          totalPages:1,
          currentPage:1,
          perPage:20,
          totalData:[],
          currentPageData:[]
      };
      this.onChangePage = this.onChangePage.bind(this);
      this.onChangeSorting = this.onChangeSorting.bind(this);
  }
  onChangePage(page) {
      // update state 
      this.setState({currentPage:page})
      var endItem = (this.state.perPage * page)-1
      var startItem = endItem-this.state.perPage
      if (page === 1) {
        startItem = 0
      }
      this.setState({
        currentPageData:this.state.totalData.slice(startItem,endItem)
      })     
  }

  onChangeSorting(event){
    let con = event.target.value
    let tmp = this.state.totalData

    if (con ==='userId ascending') {
      tmp.sort((a, b) => (a.userId < b.userId) ? 1 : -1)
      tmp.sort((a, b) => (a.Id < b.Id) ? 1 : -1)
    } else if (con ==='userId descending') {
      tmp.sort((a, b) => (a.userId > b.userId) ? 1 : -1)
      tmp.sort((a, b) => (a.Id < b.Id) ? 1 : -1)
    } else if (con ==='Id ascending') {
      tmp.sort((a, b) => (a.Id < b.Id) ? 1 : -1)
      tmp.sort((a, b) => (a.userId < b.userId) ? 1 : -1)      
    } else if (con ==='Id descending') {
      tmp.sort((a, b) => (a.Id > b.Id) ? 1 : -1)
      tmp.sort((a, b) => (a.userId < b.userId) ? 1 : -1)  
    }
    console.log(tmp)
    this.setState({
      totalData:tmp
    })
    this.setState({
      currentPageData:this.state.totalData.slice(0,this.state.perPage-1)
    })
  }
  componentDidMount = async () => {
    await fetch('https://raw.githubusercontent.com/opendream/openteam/main/posts.json')
    .then((response) => {
      if(!response.ok) {
        return response.json().then(e => {
          return Promise.reject({                   
            e
          })
        })
      } else return response.json()              
    })
    .then(result => {
      console.log(result)
      this.setState({
        totalPages:Math.ceil(Object.keys(result).length/this.state.perPage),
        totalData:result        
      })
      this.setState({
        currentPageData:this.state.totalData.slice(0,this.state.perPage-1)
      })

    })
    .catch((err) => console.log(err))
  }

  render() {
    const currList = this.state.currentPageData.map(d => (
      <div className="row border mr-1 ml-1 mt-2 itemDisplay">
        <div className=" col-md-4 col-lg-4 col-xl-4 align-self-center ">
          <img src={d.userAvatar} alt="" 
              className="imgCir mx-auto d-block" ></img>
        </div>
        <div className="col-md-8 col-xl-8">

              <div className="row mt-3">
                <div className="col-sm-3 col-md-3 col-lg-2 col-xl-2 font-weight-bold">Title : </div>
                <div className="col-md-8 col-xl-8">{d.title}</div>
              </div>
              <div className="row">
                <div className="col-sm-3 col-md-3 col-lg-2 col-xl-2 font-weight-bold">Body : </div>
                <div className="col-md-8 col-xl-8"> {d.body}</div>
              </div>
              <div className="row">
                <div className="col-sm-3 col-md-3 col-lg-2 col-xl-2 font-weight-bold">Id : </div>
                <div className="col-md-8 col-xl-8"> {d.id}</div>
              </div>
              <div className="row">
                <div className="col-sm-3 col-md-3 col-lg-2 col-xl-2 font-weight-bold">userId : </div>
                <div className="col-md-8 col-xl-8"> {d.userId}</div>
              </div>
        
        </div>
      </div>
    ))
    const sortOption = [
      {value:'sort by'},
      {value:"userId ascending"},
      {value:"userId descending"}, 
      {value:"Id ascending"},
      {value:"Id descending"}
    ]
    return (
      <React.Fragment>
          <div className="container mt-5">
            <div className="row ">
                
                <div className="col-xl-9 col-md-8 col-sm-12">
                <Pagination
                  totalPages={this.state.totalPages}
                  currentPage={this.state.currentPage}
                  showMax={5}
                  size="lg"
                  prevNext
                  activeBgColor="#18eaca"
                  activeBorderColor="#7bc9c9"
                  onClick={(event) => this.onChangePage(event)}
                />
                </div>
                <div className="col-md-4 col-xl-3 ">
                    <select id="domain" className="mt-2 mr-4 mb-3 float-right" onChange={this.onChangeSorting}>
                          {sortOption.map(d => (
                              <option key={d.value} value={d.value}>{d.value}</option>
                          ))}
                    </select>
                </div>
            
            </div>
         

            {currList}
          </div>
          
      </React.Fragment>
    );
  }
};

export default App;
 