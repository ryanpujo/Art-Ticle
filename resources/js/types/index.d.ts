

export interface User {
  id: string;
  name: string;
  email: string;
  profile_picture: string;
}

export interface Post {
  id: string;
  title: string;
  content: string;
  created_at: Date;
}
export interface PostUser {
  user: User;
  post: Post;
}

export declare function route(name:string, params?: any);
