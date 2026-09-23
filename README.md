# Travel Blog

A full-stack travel blogging application where registered users publish trip entries — location, date, rating, cost, and a safety note — and manage their own posts. Each user can view, edit, and delete only the entries they created.

Built with PHP and MySQL, server-rendered, with Bootstrap 5 for layout.

## Tech Stack

| Layer | Technology |
|---|---|
| Language | PHP |
| Database | MySQL |
| Frontend | HTML5, CSS3, Bootstrap 5 |
| Auth | PHP sessions |
| Local server | XAMPP / Apache |

## Features

- **User registration and login** with server-side session management
- **Create trip entries** — location, date, rating, image, cost, and safety notes
- **Ownership-scoped access** — every read, update, and delete is filtered by the logged-in user, so users can only modify their own posts
- **Edit and delete** with a permission check before the form is rendered
- **Route guards** — every authenticated page redirects to login if no session exists
- **Input handling** — `htmlspecialchars()` on text input to mitigate stored XSS, `intval()` on numeric fields

## Database

Two tables:

**`users`** — `id`, `username`, `password`

**`blogs`** — `id`, `username`, `location`, `date`, `rating`, `image_url`, `cost`, `security`

Posts are associated with their author by `username`.

## Running Locally

**Prerequisites:** XAMPP (or any Apache + PHP + MySQL stack).

```bash
# 1. Clone into your web root
git clone https://github.com/priteshdolai-code/<repo>.git
#    e.g. C:/xampp/htdocs/travel-blog

# 2. Create the database
#    In phpMyAdmin, create a database named `travel_blog`
#    and import schema.sql

# 3. Configure the connection
#    Edit db.php with your MySQL credentials

# 4. Start Apache and MySQL in the XAMPP control panel
#    Visit http://localhost/travel-blog/register.php
```

## Design Notes

**Prepared statements throughout.** User input reaches the database through `mysqli` prepared statements with bound parameters rather than string concatenation, so login, registration, upload, and edit are not vulnerable to SQL injection. Registration also checks for an existing username before inserting, rather than relying on a database error.

**Ownership enforced in the query, not the UI.** Rather than hiding edit and delete buttons for posts a user doesn't own, every query carries `AND username = ?`. Hiding a button only hides it; putting the condition in the `WHERE` clause means a user who guesses another post's ID still gets nothing back. `edit.php` fetches the post with the ownership condition applied and refuses to render the form if the fetch returns nothing.

**Sessions over tokens.** The app is server-rendered with no separate frontend client, so a PHP session cookie was the natural fit. Every protected page checks `$_SESSION['username']` before rendering and redirects to login otherwise.

## Known Limitations

Honest list of what this project does not yet do:

- **Passwords are stored and compared in plain text.** They should be hashed with `password_hash()` at registration and verified with `password_verify()` at login. This is the first thing to fix.
- **`delete.php` builds its SQL by string interpolation** rather than a prepared statement, unlike the rest of the app — this is an SQL injection hole and should be converted to a bound parameter.
- **Posts are linked by `username` rather than a user ID**, so a username change would orphan a user's posts. A foreign key on `users.id` would be the correct design.
- **Images are stored as external URLs**, not uploaded and served by the application.
- **No automated tests.**
- **Not deployed** — runs on a local XAMPP environment only.
