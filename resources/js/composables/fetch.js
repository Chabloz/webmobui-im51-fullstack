import { ref } from 'vue'

export function useFetch(url) {
  const data = ref(null)
  const error = ref(null)

  function fetchData() {
    fetch(url)
      .then((res) => res.json())
      .then((json) => {
        // test if json has a data and status prop
        if (!json.hasOwnProperty('data') || !json.hasOwnProperty('status')) {
          error.value = 'Invalid response';
          return;
        }
        if (json.status != 'success') {
          error.value = json.data;
        } else {
          data.value = json.data;
        }
      })
      .catch((err) => (error.value = err));
  }

  return { data, error, fetchData }
}