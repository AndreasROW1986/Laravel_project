import React, {Component} from 'react'
import ReactDom from 'react-dom'
import {findDomNode} from 'react-dom';
import $ from 'jquery';

class Edit extends React.Component {
    constructor(props) {
    super(props);
    this.comments = $comments;
    }

    handleSubmit(event) {

    }

    handleHover(event) {
    for (let i = 1; i < {{count($comments+1)}} i++) {
        $("#kr-view-button"+i).css("display", "none");
        
        $("#list-group-item"+i).hover(function(){
          $("#kr-view-button"+i).slideToggle(200);          
          }); 
      }
    }
    
    render () {
        return(
            <div classNameName="row">
                <div classNameName="col-md-6">
                    <h5>Kommentare</h5>
                    <div className="list-group list-group-flush">
                    @foreach ($comments as $comment)
                        <div className="list-group-item" id="list-group-item{{$comment->id}}">
                        <p>{{$comment->content}}</p>
                        <div id="kr-view-button{{$comment->id}}">
                            <form method="post" action="post?id={{$post->id}}">
                            @csrf
                            <button type="submit" name="edit" value="{{$comment->id}} "className="btn btn-outline-dark">Korrigieren</button>
                            </form>
                        </div>              
                        </div>
                    @endforeach
                    </div>          
                    <form className="form-group" onSubmit={this.handleSubmit}>
                    {/* </form><form className="form-group" method="POST" action="post?id={{$post->id}}"> */}
                    {/* @csrf */}
                    <div className="form-group">
                        <textarea className="form-control" name="comment">
                        {{$commentEdit}} 
                        </textarea>
                    </div>          
                    <button type="submit" className="btn btn-primary">
                    @if (@empty($commentEdit)) 
                        Hinzufügen
                    @else
                        Korrigieren
                    @endif  
                    </button>
                    </form>
                </div>
            </div> 
        )
    }
} 