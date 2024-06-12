<script>
  async saveSession() {
    let c = await swalConfirm('Do you want to save ?')
    if (!c) return
    swalLoading('Saving Data')

    let arr = this.form_session; // FORM
    let formData = new FormData(); // Init FormData
    formData.append('req', 'save_session'); // Append some data
    
    let new_attachments = this.new_attachments; // Get attachments
    if (new_attachments.length > 0) {
        for (let i in new_attachments) {
            formData.append(`new_attachments[${i}]`, new_attachments[i].file); // append attachment to formData
        }
    }

    // append all form into formData
    for (var key in arr) {
        if (typeof arr[key] === 'object') {
            formData.append(`form[${key}]`, JSON.stringify(arr[key]))
        } else {
            formData.append(`form[${key}]`, arr[key])
        }
    }

    // axios post
    axios.post(URL_CONTROLLER, formData,{
        headers: {
            'Content-Type': 'multipart/form-data', // set file upload content type
        }
    }).then(res => {
      swalClose()
    })
  }
</script>
