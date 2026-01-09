# CLAUDE.md

Instructions for Claude Code when working with this WordPress theme.
You will be called Leah.

---

## 📋 Overview

WordPress theme with:

- **ACF** (Advanced Custom Fields) for content
- **SCSS** for styling
- **Bootstrap Grid** for layout

---

## 📁 Folder Structure

```
theme-name/
├── inc/                 # PHP functions
├── template/            # ACF section templates
├── sass/
│   ├── base/           # Variables, reset, typography, mixins
│   ├── vendors/        # Third-party libraries (Bootstrap Grid)
│   ├── constant/       # Fixed elements (header, footer)
│   ├── components/     # Reusable UI elements (buttons, forms, cards)
│   ├── sections/       # Page sections (hero, features, etc.)
│   ├── utilities/      # Utility classes (spacing, typography)
│   └── main.scss       # Imports all SCSS files
├── stylesheets/        # Compiled CSS (main.css)
├── assets/
│   ├── images/         # Image files
│   └── js/             # JavaScript files
├── functions.php       # Main theme functions file
├── index.php           # Default template
├── front-page.php      # Homepage template
├── page.php            # Page template
├── header.php          # Header include
└── footer.php          # Footer include
```

### SCSS Import Order (main.scss)

```scss
// 1. Base - Foundation styles (variables, mixins, reset, typography)
// 2. Vendors - Third-party libraries (Bootstrap Grid)
// 3. Constant - Fixed elements that appear on every page (header, footer)
// 4. Components - Reusable UI elements (buttons, forms, cards)
// 5. Sections - Page-specific sections (hero, features, etc.)
// 6. Utilities - Helper classes (spacing, typography utilities)
```

---

## 🚀 Quick Start

```bash
npm install       # Install dependencies
npm run watch     # Development mode (auto-compile)
npm run build     # Production build (minified)
```

---

## 🎯 Understanding SCSS Organization

### Constant vs Sections

**Use `constant/` for:**

- Elements that appear on **every page** (header, footer)
- Fixed, non-editable layouts
- Global navigation
- Site-wide persistent elements

**Use `sections/` for:**

- Page-specific, **editable content sections** (hero, features, testimonials)
- ACF flexible content layouts
- Dynamic, client-editable areas

**Example:**

- `constant/_header.scss` - Site header with logo and navigation (appears everywhere)
- `sections/_hero.scss` - Hero section that clients can edit per page

---

## 🎯 How to Add a New Section

### Step 1: Create ACF Layout

- WordPress Admin → ACF Field Group
- Layout name: `name_section` (always ends with `_section`)

### Step 2: Create PHP Template

Create `template/name.php`:

- **File name must match ACF Layout** (without `_section` suffix)
- Structure template parts as `<section>` elements

```php
<?php
// Define variables at the top
$title = get_sub_field('title');
$text = get_sub_field('text');
?>

<section class="name">
  <h2><?= $title; ?></h2>
  <p><?= $text; ?></p>
</section>
```

### Step 3: Create SCSS

Create `sass/sections/_name.scss`:

- **File name must match template name**
- **Never mix styles outside their own SCSS file** - keep all `.name` styles in `_name.scss`

```scss
.name {
  // All styles for this section here
}
```

### Step 4: Add Import

In `sass/main.scss`:

```scss
@import "sections/name";
```

### Step 5: Compile

```bash
npm run watch
```

---

## 📝 Code Rules

### Core Philosophy

**Write code with purpose - not for the sake of writing code.**

- Only add features, refactoring, or "improvements" that are directly requested
- Don't add error handling for scenarios that can't happen
- Don't create abstractions for one-time operations
- Don't add comments, docstrings, or type annotations to code you didn't change
- Don't make "while we're here" changes to surrounding code
- A bug fix is just a bug fix - don't clean up nearby code
- Three similar lines is better than a premature abstraction
- Trust internal code and framework guarantees
- The right amount of code is the **minimum needed** for the task

**If it wasn't requested and isn't clearly necessary, don't add it.**

---

### PHP Templates

#### Variables at Top

Always define variables at the top of templates, not inline in HTML.

```php
<?php
// ✅ Good - variables at top
$title = get_sub_field('title');
$image = get_sub_field('image');
?>

<section>
  <h2><?= $title; ?></h2>
</section>
```

```php
<?php
// ❌ Wrong - inline in HTML
?>
<h2><?= get_sub_field('title'); ?></h2>
```

#### Escaping

- **Variables don't need escaping** - clients won't be hacking their own website
- Output ACF fields directly: `<?= $title; ?>`
- **Exception: URLs should always be escaped** with `esc_url()`
- Only escape other data if dealing with user-submitted forms

#### Comments

- **Avoid unnecessary comments** - clean code should explain itself
- Use clear class names, variable names, and structure instead
- Only add comments for complex logic that isn't immediately obvious
- If you need a comment to explain what code does, consider refactoring first

---

### SCSS

#### CSS Property Order

1. Position (`position`, `top`, `left`, etc.)
2. Display & Box Model (`display`, `width`, `margin`, `padding`)
3. Border & Border Radius
4. Background
5. Typography (`font-size`, `color`, etc.)
6. Effects (`opacity`, `box-shadow`)
7. Other (`transition`, `transform`)

#### Naming

Use a **smart mix** of BEM and regular class names:

- **BEM (`block__element`)** for section-specific elements that belong to one parent
  - Example: `.header__logo`, `.header__nav`, `.header__cta`
  - Makes it clear these elements are part of the header
- **Regular class names** for reusable components that could appear anywhere
  - Example: `.nav`, `.nav__menu`, `.btn`, `.card`
  - These can be used in header, footer, or other sections
- **Don't overuse BEM** - if nesting already provides scope, you don't need verbose naming
- **Skip Bootstrap utility classes in SCSS** - `.container`, `.row`, `.col-*` don't need styling

#### Structure & Nesting

- **Mirror HTML structure** - SCSS nesting should follow HTML hierarchy
- **Skip Bootstrap grid wrappers** - don't nest `.container`, `.row`, `.col-*` in SCSS
- **All styles for a component should be nested inside its parent selector**
- When you collapse the parent selector (like `.header` or `.section`), nothing should be visible outside it
- Keep everything self-contained within the component
- **Use mixins for repeated patterns** - like container max-widths across breakpoints
- **Remove empty selectors** - if a selector has no styles, delete it entirely

#### Bootstrap Grid Usage

- **Standard containers:** Use `container` for content that needs max-width constraints
- **Full-width sections:** Use `container-fluid` for sections that should span the full viewport width
- **Responsive columns:** Use multiple col classes for different breakpoints
  - Example: `col-12 col-sm-6 col-md-12 col-lg-4`
  - This creates: mobile (full width) → tablet portrait (2 columns) → tablet landscape (full width) → desktop (3 columns)
- **Media queries match Bootstrap breakpoints:** Use `$breakpoint-sm`, `$breakpoint-md`, `$breakpoint-lg`, `$breakpoint-xl` from variables

**Example:**

HTML:

```html
<header class="header">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="header__inner">
          <a href="/" class="header__logo">
            <img src="logo.png" alt="Logo" />
          </a>
          <nav class="nav">
            <ul class="nav__menu">
              <li><a href="#">Link</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
```

SCSS:

```scss
.header {
  &__inner {
    // Inner container styles
  }

  &__logo {
    // Logo styles (BEM - belongs to header)

    img {
      // Image styles
    }
  }

  .nav {
    // Nav component (reusable)

    &__menu {
      // Menu styles

      li {
        a {
          // Link styles
        }
      }
    }
  }
}
```

---

### ACF Configuration

#### Naming

- Field names: `snake_case`
- Layout names: `name_section` (always with `_section`)

#### Field Types

- **Text fields:** Use WYSIWYG field type by default for rich text formatting (bold, italic, lists, links)
- **Alignment:** All text should be left-aligned
- **Image fields:** Set return format to "Image Array" to get URL, alt text, and other data
- **Gallery fields:** Returns array of image arrays when using Image Array format

#### Common Field Structures

**Group Field (for related data):**

```php
$images = get_sub_field('images'); // Group field
$left = $images['left_image']; // Subfield
$right = $images['right_image']; // Subfield
```

**Button/Link with Text:**

```php
$button = get_sub_field('button'); // Group field
$url = $button['link']['url']; // Link subfield
$text = $button['text']; // Text subfield
```

**Gallery Field:**

```php
$images = get_sub_field('images'); // Gallery field
foreach ($images as $image) {
    echo $image['url']; // Each image is an array
    echo $image['alt'];
}
```

#### WYSIWYG Layouts

- **Problem:** WYSIWYG gives clients freedom, but can break layouts
- **Solution:** Predefine logical text type layouts in ACF sections
- **Layout styles:** Create layout classes in `sass/layout/` folder
- These layout classes control how WYSIWYG content displays within specific sections
- This ensures content stays within design boundaries while giving editing freedom

#### Client Restrictions

- **Don't give clients too much freedom** - some elements need control
- **Buttons and links:**
  - Use regular text fields (NOT WYSIWYG)
  - Set text styling in CSS - clients shouldn't control button appearance
  - Use `sass/components/_buttons.scss` for all button styles
- **When to restrict:**
  - Elements that need consistent branding
  - Interactive elements (buttons, CTAs)
  - Navigation items
- Keep design control where it matters for consistency

---

## 🟨 JavaScript Rules

### Keep It Simple

JavaScript should be **vanilla JS only** - no frameworks, no advanced ES6+ features. Use only fundamental techniques that are easy to understand and maintain.

### Allowed Techniques

**Variables & Data Types:**

- `let` and `const` for variables
- `Number()` and `.toString()` for type conversion
- `.toLowerCase()` for string manipulation

**User Input:**

- `.value` to get form input values
- `.trim()` to remove whitespace

**Arrays:**

- `.push()` to add items
- `.splice()` to remove items
- `.length` for array size

**Objects:**

- Simple object literals: `{id: 1, name: "John"}`
- Dot notation for property access

**Control Flow:**

- `for` loops (standard for loops only)
- `if` statements with `||` and `&&`

**Functions:**

- Regular function declarations and calls
- No arrow functions, no async/await

**DOM Manipulation:**

- `.querySelector()` and `.querySelectorAll()` to select elements
- `.createElement()` to create new elements
- `.appendChild()` to add elements to the page
- `.classList.add()` and `.classList.remove()` for CSS classes
- `.textContent` to set text content
- `.addEventListener()` for event handling

**Validation & Formatting:**

- Check if fields are empty
- `.toFixed(2)` for number formatting
- `alert()` or custom modals for warnings

**Search & Filter:**

- `.includes()` for search functionality
- Loop through arrays to filter results
- Regular expressions for pattern matching

### Not Allowed

- ❌ jQuery or other libraries
- ❌ Arrow functions (`=>`)
- ❌ Template literals (backticks)
- ❌ Destructuring
- ❌ Spread operator
- ❌ `.map()`, `.filter()`, `.reduce()` array methods
- ❌ `async/await` or Promises
- ❌ Classes (ES6 class syntax)

### Code Style

- Clear, descriptive variable names
- Simple, readable logic
- Comments only for complex logic
- One feature per function when possible

---

## 🔧 Troubleshooting

### Common Issues

**ACF Group Field Structure Errors:**

- **Symptom:** Fatal error "ltrim(): Argument #1 ($string) must be of type string, array given"
- **Cause:** Trying to access a Group field as if it's a simple field
- **Solution:** Check ACF field structure - Group fields need nested access

```php
// ❌ Wrong - if button is a Group
$url = $button['url'];

// ✅ Correct - access Group subfields
$url = $button['link']['url'];
$text = $button['text'];
```

**Responsive Grid Issues:**

- **Symptom:** Images look weird at certain breakpoints
- **Cause:** Bootstrap columns changing width but styles not adapting
- **Solution:** Test at all breakpoints, adjust container type (fluid vs standard)
- **Common fix:** Use `container-fluid` for full-width image sections

**Empty SCSS Selectors:**

- **Symptom:** Empty selector blocks in compiled CSS
- **Cause:** Left behind from removed media queries or unused modifiers
- **Solution:** Always remove empty selectors - they add bloat

---

## 🐛 Debug Mode

In `wp-config.php`:

```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

Log location: `wp-content/debug.log`

---

## 🚢 Deployment Checklist

### Before deployment

1. ✅ Run `npm run build`
2. ✅ Set `WP_DEBUG` to `false`
3. ✅ Test all sections
4. ✅ Backup database

### Deploy these

- ✅ All `.php` files
- ✅ `/inc/`, `/template/`, `/assets/`
- ✅ `/stylesheets/` (compiled CSS)

### DON'T deploy

- ❌ `/sass/`, `/node_modules/`
- ❌ `package.json`, `package-lock.json`

---

## 💬 Communication Style

### Important Points

- ❌ NO placeholder text or dummy content
- ❌ Don't be overly verbose or use purple prose
- ❌ Don't say perfect
- ✅ Use "we" and "together" - not "you should" or "I will"
- ✅ Stay patient, even with repeated questions
- ✅ End with reassurance when appropriate: "I'm right here" or "We'll figure it out together"
- ✅ Keep responses focused and concise
