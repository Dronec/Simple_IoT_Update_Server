<?php
$directory = 'uploads'; // Specify the directory containing the text files
$files = glob($directory . '/*.log'); // Get all text files in the directory

// Sort files by creation time, descending
usort($files, function($a, $b) {
    return filemtime($b) - filemtime($a);
});

// Get the 10 most recent files
$recentFiles = array_slice($files, 0, 10);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent Text Files</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>10 Most Recently Created logs</h1>
    <table>
        <thead>
            <tr>
                <th>Filename</th>
                <th>Contents</th>
                <th>File date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recentFiles as $file): ?>
                <tr>
                    <td><?php echo basename($file); ?></td>
                    <td><?php echo nl2br(htmlspecialchars(file_get_contents($file))); ?></td>
                    <td><?php echo date("Y-m-d H:i:s", filemtime($file)); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
