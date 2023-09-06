// Configura y muestra el botón de PayPal
paypal.Buttons({
  style: {
    layout: 'vertical',
    color: 'blue',
    shape: 'pill',
    label: 'buynow',
  },
  createOrder: function (data, actions) {
    // Crea la orden de pago
    return actions.order.create({
      purchase_units: [{
        amount: {
          value: '301.00' // Monto del pago
        }
      }]
    });
  },
  onApprove: async function (data, actions) {
    try {
      // Lógica para aprobar la orden
      await sendEmail(); // Función asíncrona que envía el pdf por correo

      // Continuar con el flujo después de que se haya enviado el correo
      actions.order.capture().then(function (details) {
        // Lógica adicional después de la captura exitosa de la orden
      });
    } catch (error) {
      // Manejar cualquier error que ocurra al enviar el correo
      console.error('Error al enviar el correo:', error);
      appendAlert(`Error al enviar el correo: ${error}`, 'danger', 'fa-circle-xmark');
    }
  },
  onCancel: function (data) {
    // El usuario canceló el pago
    appendAlert('Pago cancelado', 'danger', 'fa-circle-xmark');
  }
}).render('#paypal-button-container');