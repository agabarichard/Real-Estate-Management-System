<?php
require_once './includes/connect.php'; // Adjust path as needed

// Pagination setup
$perPage = 6;
$page = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $perPage;

// Count total available properties (status = 'available')
$stmtCount = $pdo->prepare("SELECT COUNT(*) FROM properties WHERE status = 'available'");
$stmtCount->execute();
$totalProperties = (int)$stmtCount->fetchColumn();
$totalPages = ceil($totalProperties / $perPage);

// Fetch properties for current page
$stmt = $pdo->prepare("SELECT id, title, price, category, location, preview_image FROM properties WHERE status = 'available' ORDER BY id DESC LIMIT :offset, :perpage");
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':perpage', $perPage, PDO::PARAM_INT);
$stmt->execute();
$properties = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Properties for Sale and Rent | StonePath Estates</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .property-card img {
            height: 180px;
            object-fit: cover;
            border-radius: 6px 6px 0 0;
        }
        .property-card .card-body {
            padding: 0.75rem 1rem;
        }
    </style>
</head>
<body>
<?php include './includes/nav.php'; ?>

<div class="container my-4">
    <h1 class="mb-4 text-center">Available Properties</h1>

    <?php if (count($properties) === 0): ?>
        <p class="text-center">No properties available at the moment. Please check back later.</p>
    <?php else: ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($properties as $property): ?>
                <div class="col">
                    <div class="card property-card h-100 shadow-sm">
                        <?php if ($property['preview_image'] && file_exists('../' . $property['preview_image'])): ?>
                            <img src="<?= htmlspecialchars('../' . $property['preview_image']) ?>" alt="<?= htmlspecialchars($property['title']) ?>" class="card-img-top" loading="lazy" />
                        <?php else: ?>
                            <img src="https://via.placeholder.com/400x180?text=No+Image" alt="No image available" class="card-img-top" loading="lazy" />
                        <?php endif; ?>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= htmlspecialchars($property['title']) ?></h5>
                            <p class="card-text mb-1"><strong>Price:</strong> $<?= number_format($property['price'], 2) ?></p>
                            <p class="card-text mb-1"><strong>Category:</strong> <?= ucfirst(htmlspecialchars($property['category'])) ?></p>
                            <p class="card-text mb-2"><strong>Location:</strong> <?= htmlspecialchars($property['location']) ?></p>
                            <a href="view.php?id=<?= $property['id'] ?>" class="btn btn-primary mt-auto align-self-start">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <nav aria-label="Property list pagination" class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page - 1 ?>" tabindex="-1" aria-disabled="<?= ($page <= 1) ? 'true' : 'false' ?>">Previous</a>
                </li>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= ($page === $i) ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                </li>
            </ul>
        </nav>
    <?php endif; ?>
</div>

<?php include './includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
