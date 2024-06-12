<script>
  modal_create(['ModalLog']);
	modal_resize('#ModalLog', '600px', 'auto');

  async registerLog(registerId) {
    axios.post(URL_CONTROLLER, {
      req: 'register_course_log',
      id: registerId
    }).then(res => {
      modal_fill_content('#ModalLog', 'Logs', res.data);
      modal_show('#ModalLog');
    })
  },
</script>
