<div class="container">
    <?php if ($totalPaginas > 1): ?>
        <ul class="pagination justify-content-center">
            <?php if ($paginaActual > 1): ?>
                <li class="page-item"><a class="page-link" href="?pagina=<?php echo ($paginaActual - 1); ?>"><</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <li <?php if ($paginaActual == $i)
                    echo ' class="page-item active"'; ?>><a class="page-link"
                        href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>

            <?php if ($paginaActual < ($totalRegistros / $registrosPorPagina)): ?>
                <li class="page-item"><a class="page-link" href="?pagina=<?php echo ($paginaActual + 1); ?>">></a></li>
            <?php endif; ?>
        </ul>
    <?php endif; ?>
</div>