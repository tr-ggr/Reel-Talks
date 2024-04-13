<div class="footer">
      <div class="footer-logo"></div>


      <div class="footer-phrase">
        made with love by Tristan James Y. Tolentino & Julia Laine G. Segundo
      </div>
    </div>
    <script>
      // $('form').submit(function(event) { 
      //   event.preventDefault();
      // }); 

      const myModal = document.getElementById('loginModal')
      const myInput = document.getElementById('myInput')

      myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
      })

      </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
