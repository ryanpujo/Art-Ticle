import { User } from "@/types";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";

export function getAuthenticateUser() {
  const page = usePage()
  const user = computed<User>(() => {
    return page.props.user as User;
  });
  return user;
}