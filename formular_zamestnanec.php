<form method="POST" class="new_form" required><br />
    <input  type="text" 
            name="first_name" 
            placeholder="Křestní jméno" 
            value="<?=htmlspecialchars($first_name) ?>" 
            required>
    <br />

    <input  type="text" 
            name="last_name" 
            placeholder="Příjmení" 
            value="<?=htmlspecialchars($last_name) ?>" 
            required>
    <br />

    <input  type="text"
            name="age" 
            placeholder="Věk" 
            value="<?=htmlspecialchars($age) ?>" 
            required>
    <br />

    <input  type="text"
            name="department" 
            placeholder="Oddělení" 
            value="<?=htmlspecialchars($department) ?>" 
            required>
    <br />

    <input  type="text"
            name="position" 
            placeholder="Pozice" 
            value="<?=htmlspecialchars($position) ?>" 
            required>
    <br />
    <button type="submit" name="submit">Uložit</button>
</form>