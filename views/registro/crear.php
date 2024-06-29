<main class="registro">
  <h2 class="registro__heading"><?php echo $titulo; ?></h2>
  <p class="registro__descripcion">Elige tu plan</p>

  <div class="packs__grid">
    <div class="pack">
      <h3 class="pack__nombre">Entrada Gratuita</h3>
      <ul class="pack__lista">
        <li class="pack__elemento">Acceso Online</li>
      </ul>
      <p class="pack__precio">0€</p>
            <form method="POST" action="/finalizar-registro/gratis">
                <input class="packs__submit" type="submit" value="Entrada Gratuita Online">
            </form>
        </div>

    <div class="pack">
      <h3 class="pack__nombre">Entrada Presencial</h3>
      <ul class="pack__lista">
        <li class="pack__elemento">Acceso Presencial</li>
        <li class="pack__elemento">1 Bebida Incluida</li>
        <li class="pack__elemento">Aperitivos variados</li>
        <li class="pack__elemento">Acceso a ponencias</li>
        <li class="pack__elemento">Acceso a concierto</li>
      </ul>
      <p class="pack__precio">15€</p>
      <div id="smart-button-container">
                <div style="text-align: center;">
                  <div id="paypal-button-container-virtual"></div>
                </div>
            </div>
      <?php /*<div id="paypal-container-TAD87Z9CW98A2"></div>*/ ?>
    </div>

    


    <div class="pack">
      <h3 class="pack__nombre">Entrada Premium</h3>
      <ul class="pack__lista">
        <li class="pack__elemento">Acceso Presencial</li>
        <li class="pack__elemento">1 Bebida Incluida</li>
        <li class="pack__elemento">Aperitivos variados</li>
        <li class="pack__elemento">Acceso a ponencias</li>
        <li class="pack__elemento">Acceso a concierto</li>
        <li class="pack__elemento">Camiseta Incluida</li>
      </ul>
      <p class="pack__precio">30€</p>
      <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                </div>
            </div>
      <?php /*<div id="paypal-container-7V2NFWGHKWY76"></div> */ ?>
    </div>
</div>


  </div>
</main>

<script src="https://www.paypal.com/sdk/js?client-id=AcWjEjbViOKT3kHLPFsiBlKN6ScV_ka0yjklcSBsMJDnYEhrC1Efgq3gthGQnHT5hMRMQlVaxFpQ8fhL&currency=EUR"></script>

<?php /*

<script>
  paypal.HostedButtons({
    hostedButtonId: "TAD87Z9CW98A2",
  }).render("#paypal-container-TAD87Z9CW98A2")
</script>

<script>
  paypal.HostedButtons({
    hostedButtonId: "7V2NFWGHKWY76",
  }).render("#paypal-container-7V2NFWGHKWY76")
</script>

*/ ?>


<script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'pay',
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"3","amount":{"currency_code":"EUR","value":30}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
                const datos = new FormData();
                datos.append('pack_id', orderData.purchase_units[0].description);
                datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

                fetch('/finalizar-registro/pagar', {
                    method: 'POST',
                    body: datos
                })
                .then( respuesta => respuesta.json())
                .then(resultado => {
                    if(resultado.resultado) {
                        actions.redirect('http://localhost:3000/finalizar-registro/ponencias');
                    }
                })
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');


      // Pase virtual
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'pay',
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"2","amount":{"currency_code":"EUR","value":15}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {

                const datos = new FormData();
                datos.append('pack_id', orderData.purchase_units[0].description);
                datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

                fetch('/finalizar-registro/pagar', {
                    method: 'POST',
                    body: datos
                })
                .then( respuesta => respuesta.json())
                .then(resultado => {
                    if(resultado.resultado) {
                        actions.redirect('http://localhost:3000/finalizar-registro/ponencias');
                    }
                })
                
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container-virtual');

    }
    initPayPalButton();
  </script>