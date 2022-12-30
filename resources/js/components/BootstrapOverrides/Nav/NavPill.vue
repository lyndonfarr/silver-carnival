<template>
    <a class="nav-link">
        <slot></slot>
    </a>
</template>

<script>

</script>

<style scoped>
.nav-pills .nav-link.active, .nav-pills .show > .nav-link {
  color: #fff;
  background-color: var(--dark);
}

a:hover {
  color: var(--dark);
  text-decoration: underline;
}

.nav-pills .nav-link {
  border-radius: 0.25rem;
}

.nav-link:hover, .nav-link:focus {
  text-decoration: none;
}

a.nav-link:hover {
  color: var(--dark);
}

a.nav-link {
  color: var(--dark);
}

a.text-dark:hover, a.text-dark:focus {
  color: #121416;
}

a.nav-link.disabled {
  color: #6c757d;
}

</style>