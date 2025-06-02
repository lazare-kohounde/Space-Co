<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Facture - Réservation</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h1,
        h4 {
            color: #f35525;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    
    <h1>Facture de Réservation</h1>
    <p><strong>Date :</strong> {{ now()->format('d/m/Y') }}</p>
    <p><strong>Réservation N° :</strong> {{ $reservation->id }}</p>
    <p><strong>Client :</strong> {{ $payment->author ?? 'Non renseigné' }}</p>

    <h4>Détails de la Réservation</h4>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Salle</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Montant</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $index => $detail)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $detail->room->name ?? 'Salle inconnue' }}</td>
                <td>{{ $detail->start_date }}</td>
                <td>{{ $detail->end_date }}</td>
                <td>{{ number_format($detail->price, 0, ',', ' ') }} F CFA</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Informations de Paiement</h4>
    @if ($payment)
    @if ($payment->status === 'pending')
    <p>Montant payé (via FedaPay) : {{ $payment->amount_paid }} F CFA | Transaction ID : {{ $payment->transaction_id}}</p>
    <p>Status : En attente</p>
    <p><strong>Rappel :</strong> Vous avez effectué un paiement partiel. Pour confirmer définitivement votre réservation, merci de régler le reste du montant.</p>
    @elseif ($payment->status === 'approved')
    <p><strong>Paiement soldé ✅</strong></p>
    <p>Montant payé : {{ $payment->amount_paid }} F CFA | Transaction ID : {{ $payment->transaction_id}}</p>
    <p>Status : Approuvé</p>
    <p>Approuvé par : {{ $payment->manager }}</p>
    <p>Date du 1er paiement (via FedaPay) : {{ $payment->created_at}}</p>
    <p>Date du paiement final : {{ $payment->updated_at }}</p>
    @else
    <p>Status de paiement inconnu.</p>
    @endif
    @else
    <p>Aucun paiement enregistré pour cette réservation.</p>
    @endif

    <p style="margin-top: 40px;">Merci d'avoir choisi <strong>Space-Co</strong> pour vos réservations d'espaces.</p>
</body>

</html>