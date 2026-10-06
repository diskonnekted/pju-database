# DESIGN.md — SIMPEL JALAN admin (direction record)

Status: **draft direction** (no formal DINHUB Banjarnegara brand book was provided). Owner can override any
token below; if a brand palette/logo is supplied, replace the palette section and re-check contrast.

## Design Read
Internal government admin dashboard (PJU / street-lighting management) for Dinas Perhubungan Banjarnegara
staff. Audience: civil-servant operators who monitor equipment, customer IDs (IDPEL), billing, and public
complaints. Job of the screen: scan key counts, spot problems (rusak / belum diverifikasi), and jump into a
module. Language: clean, calm, utilitarian — trust and legibility over flair.

## Dials
ENERGY 1 / RHYTHM 2 / MOTION 1 — quiet professional tool. Calm palette and flat surfaces; rhythm comes from
the content hierarchy (one announcement lead, KPI numbers, module tiles), not decoration; motion is minimal
(hover/focus feedback only, no entrance animation).

## Palette (core 2 + accent, plus functional status colors)
- Primary / accent: indigo `#4f46e5` (hover `#4338ca`). Reason: a single calm accent for links, focus rings,
  and the one primary action; distinct from the status colors below. (Draft pick — swap for DINHUB brand hue.)
- Ink `#0f172a` (headings), text `#4b5563` (body), muted `#5b6b82` (secondary text — >=4.5:1 on white and on the #eef1f7 page bg).
- Surface: white cards on `#eef1f7` page; border `#e8ecf3`.
- Functional status (meaning-bearing, not decoration): success `#15803d`, warning `#b45309`,
  info `#0e7490`, danger `#dc2626`. Each >=3:1 against its track and >=4.5:1 on white where used as text.
  Reason: these encode state (terpasang / belum diverifikasi / jenis / rusak), so they are allowed to exceed
  the decorative palette cap (R-29 applies to decoration, not status).

## Type
Inter (system-ui fallback). Reason: a neutral, highly legible grotesque for dense admin data; the fallback
keeps it clean offline. NOTE (open, R-06): Inter is a common default — if DINHUB has a brand face, prefer it.

## Radius & elevation
- Radius: cards 16px, controls 12px, icons 14px, progress = pill. Reason: one consistent card system.
- Elevation: soft shadow on cards. Reason: separate cards from the page background.
  NOTE (open, R-12): shadow currently on every panel; a future pass should flatten most and reserve lift.

## Contrast floor
All text >=4.5:1 (AA normal), large/UI >=3:1. Verify with a computed checker, not by eye.

## Out of scope here
Navbar/sidebar (shared Quirk chrome) and the Newsprint `style.md` spec (React/Tailwind — does not map to this
CI4 + Bootstrap-3 stack).
