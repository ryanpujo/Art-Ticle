import { PostUser } from "@/types";
import { MaybeComputedElementRef, MaybeElement, useIntersectionObserver } from "@vueuse/core";
import axios from "axios";
import { ref } from "vue";

type OnLoaded = (data: PostUser[]) => void;

export function useScrollPagination(target: MaybeComputedElementRef<MaybeElement>, apiEndpoint: string, onLoaded: OnLoaded) {
  let nextPage = apiEndpoint;
  const isLoading = ref(false);

  useIntersectionObserver(target, 
    ([{isIntersecting}]) => {
      if (!nextPage) {
        return;
      } 
      if (isIntersecting && !isLoading.value) {
        isLoading.value = true;
        axios.get(nextPage)
        .then((res) => res.data)
        .then((data) => {
          onLoaded(data.data)
          nextPage = data['next_page_url'];
        })
      }
      isLoading.value = false;
    },
  )
}