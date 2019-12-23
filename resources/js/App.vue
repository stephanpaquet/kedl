<template>
  <v-app>
    <v-content>
      <v-container fluid>
        <v-stepper v-model="step">
          <v-stepper-header>
            <v-stepper-step :complete="step > 1" step="1">Name of step 1</v-stepper-step>

            <v-stepper-step :complete="step > 2" step="2">Name of step 2</v-stepper-step>

            <v-stepper-step step="3">Name of step 3</v-stepper-step>
          </v-stepper-header>

          <v-stepper-items>
            <v-stepper-content step="1">
              <pay-pal-checkout
                :client="paypal"
                amount="10.00"
                env="sandbox"
                currency="USD"
                @payment-cancelled="paymentCancelled"
                @payment-completed="paymentCancelled"/>

              <v-text-field
                v-model="imageName"
                label="Select Image"
                prepend-icon="attach_file"
                @click="pickFile"/>
              <input
                ref="image"
                type="file"
                style="display: none"
                accept="image/*"
                @change="onFilePicked">
              <v-divider/>
              <vue-drag-resize
                v-if="imageUrl"
                :is-active="true"
                :w="200"
                :h="200"
                :style="'background-image: url(' + imageUrl + '); background-size:100% 100%;'"
                @resizing="resize"
                @dragging="resize">
                <p>{{ top }} х {{ left }} </p>
                <p>{{ width }} х {{ height }}</p>
              </vue-drag-resize>
            </v-stepper-content>

            <v-stepper-content step="2"/>

            <v-stepper-content step="3">
              ici
            </v-stepper-content>
          </v-stepper-items>
        </v-stepper>

        <v-btn
          :disabled="step === 1"
          color="primary"
          @click="step -= 1">
          Retour
        </v-btn>
        <v-btn
          :disabled="step === 3"
          color="primary"
          @click="step += 1">
          Continue
        </v-btn>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>

import VueDragResize from 'vue-drag-resize'
import PayPalCheckout from 'vue-paypal-checkout'

console.log('PayPal', PayPalCheckout)

export default {
  name: 'Vue',

  components: {
    VueDragResize,
    PayPalCheckout
  },

  data () {
    return {
      width: 0,
      height: 0,
      top: 0,
      left: 0,
      title: 'Image Upload',
      dialog: false,
      imageName: '',
      imageUrl: '',
      imageFile: '',
      step: 1,
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      paypal: {
        sandbox: 'Ae1sGiOG2V6gVBPFT15DY0TNFoQRYUBeowhj9tSUOgG-3uJKFghGbnwzwXc4O5yDKVnhMe2vFX_HBEbB',
        production: null
      }
    }
  },

  methods: {
    resize (newRect) {
      this.width = newRect.width
      this.height = newRect.height
      this.top = newRect.top
      this.left = newRect.left
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
          console.log('this.imageUrl', this.imageUrl)
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

  }
}
</script>

<style lang="scss">
    .v-stepper__content {
        min-height: 500px;
    }
</style>
