<?php get_header(); ?>
<main>
    <section>
        <h2 class="section-title">Mes technos</h2>

        <?php // dump($technologiesList);
        ?>
        <table style="width:100%;color:black;margin:2em;">
            <thead>
                <tr style="font-size:1.5em;">
                    <td></td>
                    <td>Techno</td>
                    <td>Niveau</td>
                    <td>Supprimer</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($currentDeveloperTechnologies as $currentDeveloperTechnology) : ?>
                    <tr>
                        <td style="padding:2em;">
                            <?php $techno_id = 'technology_' . $currentDeveloperTechnology['technologyId']; ?>
                            <?php if (get_field('logo', $techno_id)) : ?>
                                <img style="width:50px;" src="<?php the_field('logo', $techno_id); ?>" />
                            <?php endif; ?>
                        </td>
                        <td><?php echo $currentDeveloperTechnology['technologyName']; ?></td>
                        <td><?php echo $currentDeveloperTechnology['level']; ?></td>
                        <td><a href="<?php echo bloginfo('url') ?>/developer/dashboard/delete-technology?technology-id=<?php echo $currentDeveloperTechnology['technologyId']; ?>">X</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2 class="section-title">Ajouter une techno</h2>
        <form style="padding:0 2em 3em 2em;" method="post">
            <select name="technology_id" id="">
                <?php foreach ($technologiesList as $technology) : ?>
                    <option value="<?php echo $technology->term_id; ?>"><?php echo $technology->name; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="level" value="5">
            <input type="submit" name="" id="">
        </form>

    </section>
</main>
<?php get_footer(); ?>