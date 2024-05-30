# Estudo de padrões de projeto

## Chain of Responsibility

Fluxo simples de aplicação do design pattern Chain of Responsibility.

- Endpoint: `/api/payment/process`
- Método: `POST`
- Exemplo de Payload esperado:
```json
{
    "order_id": 12,
    "items": [
        {
            "id": 1,
            "name": "Teste de Produto1",
            "quantity": 1,
            "price": 34.90
        },
        {
            "id": 2,
            "name": "Teste de Produto2",
            "quantity": 1,
            "price": 34.90
        },
        {
            "id": 3,
            "name": "Teste de Produto3",
            "quantity": 1,
            "price": 34.90
        }
    ],
    "customer": {
        "id": 1,
        "name": "Arnold Blaze",
        "email": "arnold@identify.com",
        "document": "40598568798",
        "phone": "16999999999",
        "address": {}
    },
    "payment": {
        "id": 40001,
        "intermediator": "Appmax",
        "method": "pix",
        "total": 104.70
    }
}
```

- Exemplo de retorno:
  - O atribute trace, indica as classes da corrente de responsabilidade que foram executadas.
```json
{
    "data": {
        "message": "Payment processed successfully with the following Chain of Responsibility trace",
        "trace": [
            "CustomerOrderHandler",
            "PaymentOrderHandler"
        ]
    },
    "status": 200
}
```
