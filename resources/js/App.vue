<style lang="scss">
    .frameContainer {
        width: 400px;
        height: 400px;
        background-color: yellow;
    }
    .v-stepper__content {
        min-height: 500px;
    }
</style>

<template>
  <v-app>
    <v-content>
      <v-progress-circular
        v-if="loading"
        indeterminate
        color="primary"/>

      <v-container v-else fluid>
        [{{ session.image.size.width }}]
        [{{ session.image.size.height }}]
        X: {{ x }} / Y: {{ y }} - Width: {{ width }} / Height: {{ height }}</p>
        <div style="height: 400px; width: 100%; border: 1px solid red; position: relative;">
          <vue-draggable-resizable
            :w="session.image.size.width"
            :h="session.image.size.height"
            :min-width="100"
            :max-width="300"
            :parent="true"
            :lock-aspect-ratio="true"
            :style="'background-image: url(' + session.image.path + '); background-size:100% 100%;'"
            @dragging="onDrag"
            @resizing="onResize"/>
        </div>

        <pay-pal-checkout
          :client="paypal"
          amount="10.00"
          env="sandbox"
          currency="USD"
          @payment-cancelled="paymentCancelled"
          @payment-completed="paymentCancelled"/>

        <pre>{{ session }}</pre>

      </v-container>
    </v-content>
  </v-app>
</template>

<script>
/* global axios */

// @voir https://github.com/mauricius/vue-draggable-resizable

import PayPalCheckout from 'vue-paypal-checkout'
import VueDraggableResizable from 'vue-draggable-resizable'
import 'vue-draggable-resizable/dist/VueDraggableResizable.css'

console.log('PayPal', PayPalCheckout)

export default {
  name: 'Vue',

  components: {
    // VueDragResize,
    VueDraggableResizable,
    PayPalCheckout
  },

  data () {
    return {
      // width: 0,
      // height: 0,
      // top: 0,
      // left: 0,
      width: 0,
      height: 0,
      x: 0,
      y: 0,
      title: 'Image Upload',
      dialog: false,
      imageName: '',
      imageUrl: '/uploads/UGhhbnRvbV93ZWIuanBn.jpg',
      imageFile: '',
      step: 1,
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      paypal: {
        sandbox: 'Ae1sGiOG2V6gVBPFT15DY0TNFoQRYUBeowhj9tSUOgG-3uJKFghGbnwzwXc4O5yDKVnhMe2vFX_HBEbB',
        production: null
      },
      session: {},
      loading: true
    }
  },

  methods: {
    resize (newRect) {
      this.width = newRect.width
      this.height = newRect.height
      this.top = newRect.top
      this.left = newRect.left
    },

    onResize: function (x, y, width, height) {
      this.x = x
      this.y = y
      this.width = width
      this.height = height
    },
    onDrag: function (x, y) {
      this.x = x
      this.y = y
    },
    pickFile () {
      this.$refs.image.click()
    },

    paymentCancelled (payload) {
      console.log('payload', payload)
    },

    paymentCompleted (payload) {
      console.log('payload', payload)
    },
    onFilePicked (e) {
      const files = e.target.files
      if (files[0] !== undefined) {
        this.imageName = files[0].name
        if (this.imageName.lastIndexOf('.') <= 0) {
          return
        }
        const fileReader = new FileReader()
        console.log(fileReader)
        fileReader.readAsDataURL(files[0])
        fileReader.addEventListener('load', () => {
          this.imageUrl = fileReader.result
          this.imageFile = files[0] // this is an image file that can be sent to server...
          const formData = new FormData()

          console.log('this.imageFile', this.imageFile)
          // console.log('this.imageUrl', this.imageUrl)
          formData.append('file', files[0])
          formData.append('size', this.imageFile.size)
          formData.append('type', this.imageFile.type)
          formData.append('name', this.imageFile.name)

          axios.post('/upload',
            formData,
            {
              headers: {
                'Content-Type': 'multipart/form-data'
              }
            }
          ).then(function () {
            console.log('SUCCESS!!')
            this.step = 2
          })
            .catch(function () {
              console.log('FAILURE!!')
            })
        })
      } else {
        this.imageName = ''
        this.imageFile = ''
        this.imageUrl = ''
      }
    }
  },

  created () {
    console.log(this.session)
    axios.get('/session'
    ).then(response => {
      this.session = response.data
      console.log(response)
    })
      .catch(error => {
        console.log(error)
      })
      .then(() => {
        this.loading = false
      })
  }
}
</script>

