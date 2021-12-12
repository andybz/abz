import Router from './util/Router'
import common from './routes/common'
import home from './routes/home'
import team from './routes/team'
import locations from './routes/locations'
import blog from './routes/blog'
import singleProduct from './routes/singleProduct'

/**
 * Populate Router instance with DOM routes
 * @type {Router} routes - An instance of our router
 */
const routes = new Router({
	/** All pages */
	common,
	/** Home page */
	home,
	/** About Us page, note the change from about-us to aboutUs. */
	team,
	/** Locations page */
	locations,
	/** Blog/Posts page */
	blog,
	/** Single Product page */
	singleProduct,
})

/** Load Events */
routes.loadEvents()
