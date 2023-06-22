

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
  userId: string;
  name: string;
  email; string;
  profilePic: string;
  postId: string;
  title: string;
  content:  string;
  createdAt: Date;
}

export interface LinkPage {
  active: boolean;
  label: string;
  url: string;
}

export interface Paginate {
  data: PostUser[];
  firstPageUrl: string;
  nextPageUrl: string;
  links: Link[];
}

export declare function route(name:string, params?: any);
