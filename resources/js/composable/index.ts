import { getAuthenticateUser } from "./useAuthenticateUser";
import { useScrollPagination as scroll } from "./useScrollPagination";

export const useScrollPagination = scroll;
export const useAuthenticateUser = getAuthenticateUser;