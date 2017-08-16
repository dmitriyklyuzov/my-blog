import { Component, OnInit } from '@angular/core';
import { DataService } from '../../services/data.service';

@Component({
  selector: 'app-post',
  templateUrl: './post.component.html',
  styleUrls: ['./post.component.css']
})
export class PostComponent implements OnInit {

  posts:Post[];

  constructor(private dataService:DataService) {

  }

  ngOnInit() {
    this.dataService.getPosts().subscribe((posts)=>{
        // console.log(posts);
        this.posts = posts;
    });
  }



}

interface Post{
 id:number,
 title:string,
 body:string    
}
