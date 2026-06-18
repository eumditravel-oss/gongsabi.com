const fs = require('fs');
const cssPath = 'public/static/front/css/b2b-platform.css';

const appendCSS = `
/* =========================================
   SUBPAGE PREMIUM UI UPGRADES 
========================================= */

/* 1. Global Header & Hero Blocks */
.classy-hero-blocks, .b2b-page-header {
    background: linear-gradient(135deg, var(--b2b-primary) 0%, #1e3a8a 100%) !important;
    position: relative;
    padding: 60px 0 !important;
    color: #fff !important;
    border-bottom: none !important;
    box-shadow: 0 10px 30px rgba(13, 31, 88, 0.1);
}
.classy-hero-blocks .background-overlay-white::before {
    display: none !important; /* Remove old white overlay */
}
.classy-hero-blocks h2, .b2b-page-header h1, .b2b-page-header .b2b-page-title {
    color: #fff !important;
    font-weight: 800;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}
.classy-hero-blocks p, .b2b-page-header .b2b-breadcrumb {
    color: rgba(255, 255, 255, 0.8) !important;
}
.b2b-page-header .b2b-breadcrumb {
    background: rgba(255, 255, 255, 0.1);
    display: inline-block;
    padding: 6px 16px;
    border-radius: 20px;
    backdrop-filter: blur(4px);
    margin-bottom: 20px;
}
.underline-mc::after {
    background-color: var(--b2b-accent-yellow) !important;
}

/* 2. Modern Form Controls & Search */
.search_wrapper {
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    margin-top: -30px;
    position: relative;
    z-index: 10;
    border: 1px solid #E2E8F0;
}
.form-control, .dropdown-title {
    border-radius: 8px !important;
    border: 1px solid #cbd5e1 !important;
    box-shadow: 0 2px 5px rgba(0,0,0,0.02) !important;
    transition: all 0.3s ease;
    height: 48px !important;
    display: flex;
    align-items: center;
}
.form-control:focus, .dropdown-title:hover {
    border-color: var(--b2b-primary) !important;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1) !important;
}
.search_wrapper .btn-default {
    background: linear-gradient(135deg, var(--b2b-primary) 0%, #1e3a8a 100%) !important;
    color: #fff !important;
    border: none !important;
    border-radius: 8px !important;
    height: 48px;
    font-weight: 700;
    box-shadow: 0 4px 15px rgba(37, 99, 235, 0.2);
    transition: all 0.3s ease;
}
.search_wrapper .btn-default:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(37, 99, 235, 0.3);
}

/* 3. Premium Data Tables */
.classy-table.table-bordered {
    border: 1px solid #E2E8F0 !important;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    margin-top: 20px;
}
.classy-table th, .classy-table td {
    border: 1px solid #E2E8F0 !important;
    vertical-align: middle !important;
}
.classy-table thead th, .classy-table thead tr {
    background-color: #F8FAFC !important;
    color: var(--b2b-text-dark) !important;
    font-weight: 700;
    padding: 15px !important;
    border-bottom: 2px solid #CBD5E1 !important;
}
.classy-table tbody tr {
    transition: background-color 0.2s ease;
}
.classy-table tbody tr:hover {
    background-color: #F1F5F9 !important;
}

/* 4. Alert & Info Text Box */
.hero-block-content p.fsxs {
    background: rgba(255, 255, 255, 0.1);
    border-left: 4px solid var(--b2b-accent-yellow);
    padding: 15px;
    border-radius: 0 8px 8px 0;
    display: inline-block;
    text-align: left;
    margin-top: 30px !important;
    line-height: 1.6;
}
`;

if (fs.existsSync(cssPath)) {
    let cssContent = fs.readFileSync(cssPath, 'utf8');
    if (!cssContent.includes('SUBPAGE PREMIUM UI UPGRADES')) {
        fs.appendFileSync(cssPath, appendCSS, 'utf8');
        console.log('CSS Upgrades Successfully Injected!');
    } else {
        console.log('CSS Upgrades already exist.');
    }
} else {
    console.error('Target CSS file not found.');
}
