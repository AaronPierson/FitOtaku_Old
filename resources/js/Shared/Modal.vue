<template>
    <dialog id="modal-example" v-if="showModal">
        <article>
            <a href="#close"
            aria-label="Close"
            class="close"
            data-target="modal-example"
           >
            </a>
            <h3>Confirm your action!</h3>
            <p>
            Cras sit amet maximus risus. 
            Pellentesque sodales odio sit amet augue finibus pellentesque. 
            Nullam finibus risus non semper euismod.
            </p>
            <footer>
            <a href="#cancel"
                role="button"
                class="secondary"
                data-target="modal-example"
               >
                Cancel
            </a>
            <a href="#confirm"
                role="button"
                data-target="modal-example"
                >
                Confirm
            </a>
            </footer>
        </article>
    </dialog>
</template>

<script>
export default {
  data() {
    return {
      showModal: ture
    }
  }
}
</script>